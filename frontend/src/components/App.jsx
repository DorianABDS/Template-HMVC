import React, { useEffect, useState } from 'react';

export default function App() {
  const [message, setMessage] = useState('');

  useEffect(() => {
    fetch(import.meta.env.VITE_API_URL + '/api/hello')
      .then((res) => res.json())
      .then((data) => setMessage(data.message))
      .catch((err) => setMessage('Erreur : ' + err.message));
  }, []);

  return (
    <div>
      <h1>Message backend:</h1>
      <p>{message || 'Chargement...'}</p>
    </div>
  );
}
