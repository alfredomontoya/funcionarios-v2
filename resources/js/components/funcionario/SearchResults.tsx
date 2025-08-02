// src/components/SearchResults.tsx
import React, { useEffect, useState } from 'react';
import axios from "axios";

type Funcionario = {
  id: number;
  ci: string;
  nombres: string;
  apellidos: string;
  cargo: string;
  responsable: string;
  telefono: string;
};

type FuncionarioResponse = {
  status: boolean;
  count: number;
  funcionarios: Funcionario[];
};

interface SearchResultsProps {
  query: string;
}

const SearchResults: React.FC<SearchResultsProps> = ({ query }) => {

  const [funcionarios, setFuncionarios] = useState<Funcionario[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchData = async () => {
    try {
        const token = localStorage.getItem('token'); // o de donde guardes el token

        console.log(token)

        const res = await axios.get<FuncionarioResponse>(`http://127.0.0.1:8000/api/funcionario?search=${query}`, {
        headers: {
            Authorization: `Bearer ${token}`,
        }
        });
        setFuncionarios(res.data.funcionarios);
    } catch (error) {
        console.error("Error al obtener funcionarios:", error);
    } finally {
        setLoading(false);
    }
    };

  fetchData();
}, [query]);

  if (loading) return <p className="p-6">Cargando funcionarios...</p>;

  return (
    <div className="mt-6 w-full max-w-2xl px-4">
  <p className="text-gray-600 dark:text-gray-300 mb-2">
    Resultados para: <strong>{query}</strong>
  </p>

  <div className="overflow-x-auto">
    <table className="w-full border-collapse text-sm">
      <thead className="bg-gray-100 dark:bg-gray-700">
        <tr>
          <th className="px-4 py-2 text-left text-gray-800 dark:text-gray-200">ID</th>
          <th className="px-4 py-2 text-left text-gray-800 dark:text-gray-200">CI</th>
          <th className="px-4 py-2 text-left text-gray-800 dark:text-gray-200">Nombres</th>
          <th className="px-4 py-2 text-left text-gray-800 dark:text-gray-200">Responsable</th>
          <th className="px-4 py-2 text-left text-gray-800 dark:text-gray-200">Teléfono</th>
        </tr>
      </thead>
      <tbody>
        {funcionarios.map((item) => (
          <tr
            key={item.id}
            className="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-shadow"
          >
            <td className="px-4 py-2 rounded-l-xl">{item.id}</td>
            <td className="px-4 py-2">{item.ci}</td>
            <td className="px-4 py-2">{item.nombres} {item.apellidos}</td>
            {/* <td className="px-4 py-2">{item.cargo}</td> */}
            <td className="px-4 py-2">{item.responsable}</td>
            <td className="px-4 py-2 rounded-r-xl">{item.telefono}</td>
          </tr>
        ))}
      </tbody>
    </table>
  </div>
</div>

  );
};

export default SearchResults;
