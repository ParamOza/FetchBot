'''
When wolfram and wiki can't find an answer, or user specifies human help,
send a the question to admin. Whenever they respond, send admin answer
back to original asker.
'''

import os
from twilio.rest import Client
import issues

bot_num = '+15743558881'

admin = [
	# {'name': 'Miles', 'num': '6083382666'},
	{'name': 'Mateo', 'num': '6086225392'},
	{'name': 'Param', 'num': '9712951182'},
	{'name': 'Karsey', 'num': '6085357608'}
]

client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])

def send_help(q, ask_num):
	# UPDATE DATABASE
	u_id = issues.create_issue(q, ask_num)

	prompt = '#{}#\nSomeone asked this question: {}\nDo you know the answer?🐶' \
	.format(u_id, q)

	for ad in admin:
		ad_num = ad['num']
		ad_name = ad['name']
		message = client.messages.create(
			body = prompt,
			from_ = bot_num,
			to = ad_num
			)
