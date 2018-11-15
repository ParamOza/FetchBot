'''
google cloud function thingy
'''

from responses import respond
from twilio.twiml.messaging_response import MessagingResponse
from twilio.rest import Client
import re, os

bot_num = os.environ['BOT_NUM']

def command(s):
	return ' '.join(s.split()[1:])


def hello(request):
	q = request.values.get('Body', None)
	url = request.url
	resp = MessagingResponse()

	for param in url.split('&'):
		mat = re.search(r'From=%2B([\d\w]+)', param)
		if mat:
			from_num = '+{}'.format(mat.group(1))
			break

	if not q:
		answer = 'Please ask me something!! 🐶'
	else: 
		answer = respond(q)
	resp.message(answer)
	return str(resp)

