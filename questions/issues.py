import sqlite3

conn = sqlite3.connect('issues.db')
c = conn.cursor()

def open_close(func):
	def wrap(*args, **kwargs):
		global c
		conn = sqlite3.connect('issues.db')
		c = conn.cursor()
		res = func(*args, **kwargs)
		conn.commit()
		# conn.close()
		return res
	return wrap


def gen_id():
	import random
	return ''.join(random.choice('1234567890abcdef') for i in range(12))

@open_close
def create_issue(q, num):
	global c
	u_id = gen_id()
	data = {'id': u_id, 'q': q, 'num': num}
	c.execute("INSERT INTO issues VALUES (:id, :q, :num)", data)
	return u_id

@open_close
def resolve(issue_id):
	entry = find(issue_id)
	c.execute("DELETE FROM issues WHERE id='{}'".format(issue_id))
	print(entry)
	return entry

@open_close
def find(u_id):
	global c
	c.execute("SELECT * FROM issues WHERE id='{}'".format(u_id))
	return c.fetchone()

# conn.commit()
# conn.close()


if __name__ == '__main__':

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
		# c.execute("DELETE FROM issues WHERE id='da85bf5fdd23'")

		res = find('da85bf5fdd23')
		if res:
			u_id, issue, from_num = res
			from_num  = '+{}'.format(from_num)
			print(u_id, issue, from_num)
		else:
			print('No entry :(')