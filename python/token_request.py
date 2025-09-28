import requests

payload = { 'tokenx': '123' }

try:
	response = requests.post('http://localhost:8000/api/token', data=payload, verify=False)
	print(response.text)
except requests.exceptions.RequestException:
	print('error')
