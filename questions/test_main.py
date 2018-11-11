'''
google cloud function thingy
'''

from responses import respond
from twilio.twiml.messaging_response import MessagingResponse
from twilio.rest import Client
import re, os

from flask import Flask, request
app = Flask(__name__)

bot_num = os.environ['BOT_NUM']

def command(s):
	return ' '.join(s.split()[1:])


@app.route('/api')
def api():
	q = request.args.get('q')
	print(q)
	return 'Yay!'


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

	answer = respond(q)
	resp.message(answer)
	return str(resp)

if __name__ == '__main__':
	app.run(debug=True)