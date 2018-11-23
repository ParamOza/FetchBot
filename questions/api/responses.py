'''
Primary module for getting answers from Wolfram Alpha, Wikipedia,
and personalized responses.
'''
import wolf, wiki
import requests, random
import json

def handle_personality(q):
	if q.startswith("dad joke"):
		joke = requests.get('https://icanhazdadjoke.com/',headers={'Accept': 'application/json'}).text
		joke = json.loads(joke)
		if joke["joke"]:
			joke = joke["joke"]
			if joke:
				emoji = random.choice(['👽', '💩', '😹', '👨', '🙌', '👈', '🤦‍', '😎'])
				return joke + " " + emoji

	joke = requests.get('https://geek-jokes.sameerkumar.website/api') \
	.text.strip()[1:-1]

	personal_questions = {
		'what is love': 'Baby don\'t hurt me',
		'how are you': 'I\'m {}!'.format(random.choice( \
			['fantastic', 'stellar', 'joyous', 'stupendous'])),
		'who made you': 'I was created by Miles Boswell.👨‍💻',
		'open the pod bay doors': 'I\'m sorry Dave, I\'m afraid I can\'t do that.',
		'tell me a joke': 'OK, here\'s one I like:\n"{}"'.format(joke),
		'wow': 'I know, right??',
		'do you know the muffin man': 'Who lives on Drurey Lane? Yes I do.',
		'who are you': 'My name is Fetch!🐶',
		'what do you do': 'Ask me a question, and I\'ll try my best to give you an answer!🐶'
	}

	if 'tootsie pop' in q and 'licks' in q:
		return 'At least a lot.'

	if q.startswith('where are we going'):
		return 'Flavortown, baby!'

	if 'siri' in q:
		return 'Siri and I are close friends, but we all know who\'s better.🤷‍♂️'

	if 'higher ground' in q or 'high ground' in q:
		return 'It\'s over Anakin!'

	for personal_q in personal_questions:
		if q.startswith(personal_q):
			return personal_questions[personal_q]
	else:
		return


def get_answer(q):
	ans = wolf.respond(q)
	if not ans:
		ans = wiki.search(q)

	if ans['ans']:
		resp = '🐶Here\'s what {} said: {}'.format(ans['src'], ans['ans'])
	else:
		if ans['src']:
			resp = '{} couldn\'t find an answer for your question: "{}"' \
				.format(ans['src'], q)
		else:
			resp = 'Uh-oh.  We can\'t seem to find an answer!'

		#resp = 'I\'ll ask my friends if they know the answer. \
		#	If they send me one, I\'ll send their response right away!🐶'
	return resp


def respond(q):
	personal_q = handle_personality(q.lower())
	return personal_q if personal_q else get_answer(q)
