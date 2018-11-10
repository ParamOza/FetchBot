'''
google cloud function thingy
'''

import wiki, wolf
from twilio import MessagingResponse


def hello(request):
	if request.method == 'POST':
		body = request.values.get('Body', None)
		resp = MessagingResponse()

		msg = resp.message('Hello there. {}'.format(body))

		return str(resp)