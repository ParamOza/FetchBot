'''
google cloud function thingy
'''

import wiki, wolf
from twilio.twiml.messaging_response import MessagingResponse


def hello(request):
	q = request.values.get('Body', None)

	if q.lower().startswith('!wiki'):
		ans = wiki.search(q)

	ans = wolf.respond(q)
	if not ans:
		ans = wiki.search(q)

	resp = MessagingResponse()

	if ans['ans']:
		resp.message('🐶Here\'s what {} said: {}'.format(ans['src'], ans['ans']))
	else:
		resp.message('{} couldn\'t find an answer for your question: "{}"' \
			.format(ans['src'], q))

		resp.message('I\'ll ask my friends if they know the answer. \
			If they send me one, I\'ll send their response right away!🐶')

	return str(resp)