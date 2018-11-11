from flask import Flask, request, jsonify
import urllib
from responses import handle_personality, get_answer

app = Flask(__name__)


tasks = [
    {
        'id': 1,
        'title': u'Buy groceries',
        'description': u'Milk, Cheese, Pizza, Fruit, Tylenol', 
        'done': False
    },
    {
        'id': 2,
        'title': u'Learn Python',
        'description': u'Need to find a good Python tutorial on the web', 
        'done': False
    }
]


@app.route('/api')
def hello():
	q = request.args.get('q')
	print(q)
	answer = get_answer(q)
	return 'Answer: {}'.format(q)
	


if __name__ == '__main__':
	app.run(debug=True)