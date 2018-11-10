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
		data = wiki.search(query)

		dataLength = len(data)

		resultContent = wiki.summary(data[0])

		return parse(resultContent, 'Wikipedia')

if __name__ == '__main__':
	search(input("Search: "))