'''
google cloud function thingy
'''

from responses import handle_personality, get_answer
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

	personal_q = handle_personality(q.lower())
	if personal_q:
		response = resp.message(personal_q)
		return str(resp)

	ans = get_answer(q)
	resp.message(ans)

	return str(resp)

