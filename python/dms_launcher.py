import re, uuid
import webbrowser, requests
import hashlib, secrets

def get_hash(str):
	result = hashlib.md5(mac.encode())
	return result.hexdigest()

def get_registered_mac():
	try:
		response = requests.get('http://localhost:8000/api/mac', verify=False)
		return response.json()
	except requests.exceptions.RequestException:
		return 'error'

def post_token(mac):

	token = secrets.token_urlsafe(32)
	payload = { 'token': token, 'hashed_mac': get_hash(mac) }

	try:
		response = requests.post('http://localhost:8000/api/token', data=payload, verify=False)
		if response.text == 'success':
			return token
		else:
			return False
	except requests.exceptions.RequestException:
		return False


if __name__ == '__main__':

	mac = ':'.join(re.findall('..', '%012x' % uuid.getnode()))
	registered_macs = get_registered_mac()

	print(registered_macs)

	print(get_hash(mac))

	if get_hash(mac) in registered_macs:

		token = post_token(mac)
		if token:
			url = "http://localhost:8000/login/" + token
			webbrowser.open(url, 1)
			exit()
		else:
			print('post failed. server 500')
	else:
		print('not registered')
