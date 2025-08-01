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
      const res = await axios.get<FuncionarioResponse>("http://127.0.0.1:8000/api/funcionario?search="+query);
      console.log(res.data.funcionarios)
      setFuncionarios(res.data.funcionarios);
    } catch (error) {
      console.error("Error al obtener funcionarios:", error);
    } finally {
      setLoading(false);
    }
  };

  fetchData();
}, []);

  if (loading) return <p className="p-6">Cargando funcionarios...</p>;

  return (
    <div className="mt-6 w-full max-w-2xl px-4">
      <p className="text-gray-600 mb-2">Resultados para: <strong>{query}</strong></p>
      <ul className="space-y-2">
        <div className="overflow-x-auto">
        <table className="w-full border-collapse">
          <thead>
            <tr>
              <th className="px-4 py-2 text-left">ID</th>
              <th className="px-4 py-2 text-left">CI</th>
              <th className="px-4 py-2 text-left">Nombres</th>
              <th className="px-4 py-2 text-left">Apellidos</th>
              <th className="px-4 py-2 text-left">Cargo</th>
              <th className="px-4 py-2 text-left">Responsable</th>
              <th className="px-4 py-2 text-left">Teléfono</th>
            </tr>
          </thead>
          <tbody className="space-y-4">
            {funcionarios.map((item, i) => (
              <tr
                key={item.id}
                className="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow"
              >
                <td className="px-4 py-2 rounded-l-xl">{item.id}</td>
                <td className="px-4 py-2">{item.ci}</td>
                <td className="px-4 py-2">{item.nombres}</td>
                <td className="px-4 py-2">{item.apellidos}</td>
                <td className="px-4 py-2">{item.cargo}</td>
                <td className="px-4 py-2">{item.responsable}</td>
                <td className="px-4 py-2 rounded-r-xl">{item.telefono}</td>
              </tr>
            ))}
            
          </tbody>
        </table>
      </div>
        
      </ul>
    </div>
  );
};

export default SearchResults;
