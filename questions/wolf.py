'''
Module for getting responses from wolfram alpha
'''

import wolframalpha, os, re
from parse import parse


def respond(q):

	app_id = os.environ['WOLF_KEY']
	client = wolframalpha.Client(app_id)
	res = client.query(q)

	def show_wolf_results(ans, res):

		for r in res.pods:
			if r.title == 'Wikipedia summary':
				ans = r
				break

		if ans.title == 'Input interpretation':
			try:
				ans = next(res.results)
			except:
				ans = next(res.pods)

		# how many should return number
		number = re.search(r'\(total: (\d+)\)' , ans.text)
		if number:
			reply = number.group(1)
		else:
			reply = ans.text
		return parse(reply, 'Wolfram Alpha')

	try: 
		answer = next(res.pods)
	except Exception as e:
		return
	else:
		reply = show_wolf_results(answer, res)
		return reply


if __name__ == '__main__':
	q = input('Ask me something: ')
	reply = respond(q)
	print(reply)