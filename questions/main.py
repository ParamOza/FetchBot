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

bot_num = '+15743558881'

def command(s):
	return ' '.join(s.split()[1:])


def hello(request):
	q = request.values.get('Body', None)
	url = request.url
	resp = MessagingResponse()
	client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])


	for param in url.split('&'):
		mat = re.search(r'From=%2B([\d\w]+)', param)
		if mat:
			from_num = '+{}'.format(mat.group(1))
			break

	if q.lower() == 'what is love':
		resp.message('Baby don\'t hurt me, no more..🐶')
		return str(resp)


	# "!ans The 1st element is Hydrogen."
	if q.lower().startswith('!ans'): # check if admin
		admin_response = command(q)
		print(admin_response)

		# resolve issue
		admin_num = from_num
		recent_from_bot = client.messages.list(
				from_=bot_num,
				to=admin_num
				)
		resolved_id = recent_from_bot[0].body.split('#')[1]

		# get entry from DATABASE
		entry = issues.resolve(resolved_id)
		print(entry)
		if entry:
			resp.message('Thanks for your help!🐶')
			_, issue, ask_num = entry

			# send answer back to asker
			follow_up = '"{}"\n👨‍💻Admin Response:\n{}'.format(issue, admin_response)
			msg_response = client.messages.create(
				body=follow_up,
				to=ask_num,
				from_=bot_num
				)
			return str(resp)


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
		# PLACE ISSUE IN DATABASE

	return str(resp)

