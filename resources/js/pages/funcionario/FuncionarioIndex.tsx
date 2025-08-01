import React, { useEffect, useState } from 'react';
import axios from 'axios';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

interface Funcionario {
  id: number;
  ci: string;
  nombres: string;
  apellidos: string;
  cargo: string;
  responsable: string;
  telresponsable: string;
  edificio: string;
}

export default function FuncionarioIndex() {
  const [funcionarios, setFuncionarios] = useState<Funcionario[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchFuncionarios = async () => {
      try {
        const { data } = await axios.get('/api/funcionario'); // Asegúrate que esta ruta devuelva los datos
        console.log('FUNCIONARIOS');
        setFuncionarios(data.funcionarios);
        console.log(data.funcionarios);
        funcionarios.map(f => {
          console.log(f);
        })
      } catch (err) {
        setError('Error al cargar funcionarios');
      } finally {
        setLoading(false);
      }
    };

    fetchFuncionarios();
  }, []);

  // if (loading) return <p>Cargando funcionarios...</p>;
  if (error) return <p>{error}</p>;

  return (
    <AppLayout>
      <Head title="Dashboard" />
      <div className="p-4">
        <h2 className="text-2xl font-bold mb-4">Lista de Funcionarios</h2>
        <table className="w-full border-collapse border border-gray-300">
          <thead>
            <tr className="bg-gray-100">
              <th className="border border-gray-300 p-2">ID</th>
              <th className="border border-gray-300 p-2">CI</th>
              <th className="border border-gray-300 p-2">Nombres</th>
              <th className="border border-gray-300 p-2">Apellidos</th>
              <th className="border border-gray-300 p-2">Cargo</th>
              <th className="border border-gray-300 p-2">Encargado</th>
              <th className="border border-gray-300 p-2">Teléfono</th>
              <th className="border border-gray-300 p-2">Foto</th>
            </tr>
          </thead>
          <tbody>
            {funcionarios.map(f => (
              <tr key={f.id} className="text-center">
                <td className="border border-gray-300 p-2">{f.id}</td>
                <td className="border border-gray-300 p-2">{f.ci}</td>
                <td className="border border-gray-300 p-2">{f.nombres}</td>
                <td className="border border-gray-300 p-2">{f.apellidos}</td>
                <td className="border border-gray-300 p-2">{f.cargo}</td>
                <td className="border border-gray-300 p-2">{f.responsable ? 'Sí' : 'No'}</td>
                <td className="border border-gray-300 p-2">{f.telresponsable}</td>
                <td className="border border-gray-300 p-2">
                  {/* {f.foto ? (
                    <img
                      src={f.foto}
                      alt={`${f.nombres} ${f.apellidos}`}
                      className="h-12 w-12 object-cover rounded-full mx-auto"
                    />
                  ) : (
                    'Sin foto'
                  )} */}
                </td>
              </tr>
            ))}
            {funcionarios.length === 0 && (
              <tr>
                <td colSpan={8} className="p-4 text-center text-gray-500">
                  No hay funcionarios para mostrar.
                </td>
              </tr>
            )}
          </tbody>
        </table>
      </div>
    </AppLayout>
  );
}
