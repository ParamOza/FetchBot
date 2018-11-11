from twilio.rest import Client
import os
import issues

def admin_answer(admin_name, admin_num):

	client = Client(os.environ['TWILIO_ACCOUNT_SID'], os.environ['TWILIO_AUTH_TOKEN'])
	# admin_num = '+16083382666'

	from_bot = client.messages.list(
			from_='+15743558881',
			to=admin_num
			)

	from_admin = client.messages.list(
			from_='+16083382666',
			to='+15743558881'
			)

	prompt, response = next(zip(from_bot, from_admin))

	u_id = prompt.body.split('#')[1]

	# return entry of issue_id from responses table in issues.db
	try:
		issed_id, issue, from_num = issues.find(u_id)
	except Exception as e:
		# print(e)
		return
	else:
		# response begins with "!ans"
		answer = ' '.join(responses.split()[1:])
		return answer, admin_name


if __name__ == '__main__':
	admin = {'Miles': '+16083382666'}
	print(resolve(admin))