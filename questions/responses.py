'''
Primary module for getting answers from Wolfram Alpha, Wikipedia,
and personalized responses.
'''
import wolf, wiki
import requests, random

def handle_personality(q):
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
	}

	if 'tootsie pop' in q and 'licks' in q:
		return 'At least a lot.'

	if 'where are we going' == q:
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
		resp = '{} couldn\'t find an answer for your question: "{}"' \
			.format(ans['src'], q)

		resp = 'I\'ll ask my friends if they know the answer. \
			If they send me one, I\'ll send their response right away!🐶'
	return resp