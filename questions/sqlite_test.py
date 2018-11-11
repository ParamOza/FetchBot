import sqlite3

conn = sqlite3.connect('issues.db')

c = conn.cursor()

def gen_id():
	import random
	return ''.join(random.choice('1234567890abcdef') for i in range(12))

def create_issue(q, num):
	u_id = gen_id()
	data = {'id': u_id, 'q': q, 'num': num}
	c.execute("INSERT INTO responses VALUES (:id, :q, :num)", data)
	return u_id

try:
	c.execute('''CREATE TABLE issues (
		id text,
		q text,
		num integer
		)''')
except:
	# q = input('Enter a question: ')
	# u_id = gen_id()
	# data = {'id': u_id, 'q': q, 'num': '+16083382666'}
	# # c.execute("INSERT INTO employees VALUES ('miles', 'boswell', '23')")
	# c.execute("INSERT INTO issues VALUES (:id, :q, :num)", data)
	# print(u_id)

	c.execute("SELECT * FROM issues WHERE id='cd1a1982aed6'")
	print(c.fetchall())

conn.commit()

conn.close()