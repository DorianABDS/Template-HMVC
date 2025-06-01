import { useState } from "react";

function HelloApi() {
  const [message, setMessage] = useState("");
  const [loading, setLoading] = useState(false);

  const callApi = async () => {
    setLoading(true);
    try {
      const response = await fetch(`${import.meta.env.VITE_API_URL}/api/hello`);
      const data = await response.json();
      setMessage(data.message);
    } catch (error) {
      setMessage("Erreur lors de l'appel API");
      console.error(error);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="p-4 rounded-xl shadow bg-white w-fit mx-auto text-center space-y-2">
      <button
        onClick={callApi}
        className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg"
        disabled={loading}
      >
        {loading ? "Chargement..." : "Appeler l'API"}
      </button>
      {message && <p className="mt-2 text-gray-700">{message}</p>}
    </div>
  );
}

export default HelloApi;
