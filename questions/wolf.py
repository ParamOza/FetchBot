'''
Module for getting responses from wolfram alpha
'''

import wolframalpha, os

app_id = os.environ['WOLF_KEY']
client = wolframalpha.Client(app_id)

q = input('Ask me something: ')

res = client.query(q)

# for pod in 