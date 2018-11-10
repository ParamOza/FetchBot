import wikipedia as wiki
import json

# qs = ['who is', 'who was', 'what is', 'what was', 'where is', 'where was', 'when was',
# 	 'when is', 'why was', 'why is', 'how is', 'how was'] 
# question = input("Search Wikipedia: ")
# sq = ''
# for q in qs:
# 	if question.lower().startswith(q):
# 		sq = question.lower().split(q)[1].strip()
# 		print(wiki.summary(sq))
# 		break

# else:
# 	data = wiki.search(question)

# 	dataLength = len(data)

# 	print(str(dataLength) + " results found.")
# 	for i in range(dataLength):
# 		print(str(i) + ". " + data[i])

# 	num = int(input("Number associated with desired search query: "))
# 	resultContent = wiki.summary(data[num])

# 	print("Wikipedia summary for " + data[num] + ": " + resultContent)

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

		print(str(dataLength) + " results found.")
		for i in range(dataLength):
			print(str(i) + ". " + data[i])

		num = int(input("Number associated with desired search query: "))
		resultContent = wiki.summary(data[num])

		return "Wikipedia summary for " + data[num] + ": " + resultContent
search(str(input("Search: ")))
