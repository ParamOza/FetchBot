'''
Module for getting responses from wolfram alpha
'''

import wolframalpha, os, re
# import wiki

app_id = os.environ['WOLF_KEY']
client = wolframalpha.Client(app_id)

q = input('Ask me something: ')

res = client.query(q)


def show_wolf_results(ans, res):

	for r in res.pods:
		print(r, r.title)
		if r.title == 'Wikipedia summary':
			ans = r
			break

	if ans.title == 'Input interpretation':
		ans = next(res.results)

	# how many should return number
	number = re.search(r'\(total: (\d+)\)' , ans.text)
	print(number, number.group(0))
	if number:
		reply = number.group(1)
	else:
		reply = ans.text
	return reply


try: 
	answer = next(res.pods)

except Exception as e:
	print('I couldnt find anything for "{}" :('.format(q))
	dir_to_wiki = input('Would you like to search from Wikipedia? (y/n) ')
	if dir_to_wiki.lower() == 'y':
		pass
		# reply = wiki.search(q)
	else:
		exit()

else:
	reply = show_wolf_results(answer, res)

	print()
	print(reply)

