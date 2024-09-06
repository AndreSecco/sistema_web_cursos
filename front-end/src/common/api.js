import axios from "axios";

const apiUri = () => {
  const currentHost = window.location.hostname

  if (currentHost === 'localhost') { return 'http://localhost:8000' }

  if (currentHost.includes('gclass.inovess.com.br')) { return 'https://apigclass.inovess.com.br' }
}

const client = axios.create({
    baseURL: apiUri(), 
    headers: {
      Accept: 'application/json',
      'Content-Type': 'application/json;charset=UTF-8',
    }
  })

export default client  