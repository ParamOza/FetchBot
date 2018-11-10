'''
google cloud function thingy
'''

import wiki, wolf
from twilio.twiml.messaging_response import MessagingResponse


def hello(request):
	q = request.values.get('Body', None)

	ans = wolf.respond(q)
	if not ans:
		ans = wiki.search(q)

	resp = MessagingResponse()

	resp.message('Here\'s what {} said: {}'.format(ans['src'], ans['ans']))

	return str(resp)