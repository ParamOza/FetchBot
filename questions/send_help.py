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
	{'Miles': '6083382666'},
	{'Mateo': '6086225392'},
	{'Param': '9712951182'},
	{'Karsey': '6085357608'}
]

client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])

def send_help(q, ask_num):
	# enter new issue into issue.db
	u_id = issues.create_issue(q, ask_num)

	prompt = '#{}#\nSomeone asked this question: {}\nDo you know the answer?🐶' \
	.format(u_id, q)

	for name, ad_num in admin.items():
		message = client.messages.create(
			body = prompt,
			from_ = bot_num,
			to = ad_num
			)
