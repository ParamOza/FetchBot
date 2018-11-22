import wikipedia as wiki
import json
from parse import parse


def search(query):
	qs = ['who is', 'who was', 'what is', 'what was', 'where is', 'where was', 'when was',
	 'when is', 'why was', 'why is', 'how is', 'how was']
	sq = ''
	for q in qs:
		if query.lower().startswith(q):
			sq = question.lower().split(q)[1].strip()
			return wiki.summary(sq)
			break

	else:
		try:
			data = wiki.search(query)
		except Exception:
			return
		else:
			if len(data) > 0:
				resultContent = wiki.summary(data[0])
			else:
				return
			# return first 3 sentences of summary
			resultContent = resultContent.split('.')[:3][0] + '.'

			return parse(resultContent, 'Wikipedia')

if __name__ == '__main__':
	search(input("Search: "))
