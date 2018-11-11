'''
google cloud function thingy
'''

from responses import handle_personality, get_answer
from twilio.twiml.messaging_response import MessagingResponse
from twilio.rest import Client
import re, os

from flask import Flask, request
app = Flask(__name__)

bot_num = os.environ['BOT_NUM']

def command(s):
	return ' '.join(s.split()[1:])


@app.route('/sms')
def hello():
	q = request.values.get('Body', None)
	url = request.url
	resp = MessagingResponse()


	for param in url.split('&'):
		mat = re.search(r'From=%2B([\d\w]+)', param)
		if mat:
			from_num = '+{}'.format(mat.group(1))
			break

	personal_q = handle_personality(q.lower())
	if personal_q:
		response = resp.message(personal_q)
		return str(resp)

	# ---------------ADMIN-RESPONSE-------------

	# client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])
	# # "!ans The 1st element is Hydrogen."
	# if q.lower().startswith('!ans'): # check if admin
	# 	admin_response = command(q)
	# 	print(admin_response)

	# 	# resolve issue
	# 	admin_num = from_num
	# 	recent_from_bot = client.messages.list(
	# 			from_=bot_num,
	# 			to=admin_num
	# 			)
	# 	resolved_id = recent_from_bot[0].body.split('#')[1]

	# 	# get entry from DATABASE
	# 	entry = issues.resolve(resolved_id)
	# 	print(entry)
	# 	if entry:
	# 		resp.message('Thanks for your help!🐶')
	# 		_, issue, ask_num = entry

	# 		# send answer back to asker
			# follow_up = '"{}"\n👨‍💻Admin Response:\n{}'.format(issue, admin_response)
	# 		msg_response = client.messages.create(
	# 			body=follow_up,
	# 			to=ask_num,
	# 			from_=bot_num
	# 			)
	# 		return str(resp)

	# resp.message('🤔')

	ans = get_answer(q)
	resp.message(ans)
	# PLACE ISSUE IN DATABASE or summin

	return str(resp)

if __name__ == '__main__':
	app.run(debug=True)