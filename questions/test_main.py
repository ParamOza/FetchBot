'''
google cloud function thingy
'''

import os
from flask import Flask, request
from twilio.twiml.messaging_response import MessagingResponse
from twilio.rest import Client


client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])

app = Flask(__name__)


@app.route('/sms')#, methods=['GET', 'POST'])
def hello():
	body = request.values.get('Body', None)
	print(body)

	resp = MessagingResponse()

	resp.message('Hello there. {}'.format(body))

	return str(resp)
	# return 'Hello world {}'.format(body)

if __name__ == '__main__':
	app.run(debug=True)