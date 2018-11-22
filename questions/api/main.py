'''
API for fetchbot.dog website
Make a get request to this GC Function, return plaintext
'''

from responses import respond
from urllib.parse import unquote_plus as decode

def get_response(request):
	# get query from request
	q = request.args.get('q')
	if not q:
		return '😬 That\'s a bad request.  Can you try again?'
	q = decode(q)
	print(q)

	answer = respond(q)
	return str(answer)
