'''
google cloud function thingy
'''
import wiki, wolf
from twilio.twiml.messaging_response import MessagingResponse
# from twilio.twiml.voice_response import VoiceResponse
from twilio.rest import Client
from send_help import send_help
import issues
import re, os
import requests, random

from flask import Flask, request
app = Flask(__name__)

bot_num = '+15743558881'

def command(s):
	return ' '.join(s.split()[1:])

def handle_personality(q):

	joke = requests.get('https://geek-jokes.sameerkumar.website/api') \
	.text.strip()[1:-1]

	personal_questions = {
		'what is love': 'Baby don\'t hurt me',
		'how are you': 'I\'m {}!'.format(random.choice( \
			['fantastic', 'stellar', 'joyous', 'stupendous'])),
		'who made you': 'I was created by Miles Boswell.👨‍💻',
		'open the pod bay doors': 'I\'m sorry Dave, I\'m afraid I can\'t do that.',
		'tell me a joke': 'OK, here\'s one I like:\n"{}"'.format(joke),
		'wow': 'I know, right??'
	}

	if 'siri' in q:
		return 'Siri and I are close friends, but we all know who\'s better.🤷‍♂️'

	if 'higher ground' in q:
		return 'It\'s over Anakin!'

	for personal_q in personal_questions:
		if q.startswith(personal_q):
			return personal_questions[personal_q]
	else:
		return

@app.route('/sms')
def hello():
	q = request.values.get('Body', None)
	url = request.url
	resp = MessagingResponse()
	client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])


	for param in url.split('&'):
		mat = re.search(r'From=%2B([\d\w]+)', param)
		if mat:
			from_num = '+{}'.format(mat.group(1))
			break

	personal_q = handle_personality(q.lower())
	if personal_q:
		resp.message(personal_q)
		return str(resp)

	# ---------------ADMIN-RESPONSE-------------

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

	resp.message('🤔')

	ans = wolf.respond(q)
	if not ans:
		ans = wiki.search(q)

	if ans['ans']:
		resp.message('🐶Here\'s what {} said: {}'.format(ans['src'], ans['ans']))
	else:
		resp.message('{} couldn\'t find an answer for your question: "{}"' \
			.format(ans['src'], q))

		resp.message('I\'ll ask my friends if they know the answer. \
			If they send me one, I\'ll send their response right away!🐶')
		# PLACE ISSUE IN DATABASE or summin

	return str(resp)

if __name__ == '__main__':
	app.run(debug=True)