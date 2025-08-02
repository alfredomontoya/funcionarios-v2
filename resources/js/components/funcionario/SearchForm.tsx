import React from 'react';
import { Search } from 'lucide-react'; // npm install lucide-react

interface SearchFormProps {
  query: string;
  onChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
  onSubmit: (e: React.FormEvent<HTMLFormElement>) => void;
  submitted: boolean;
}

const SearchForm: React.FC<SearchFormProps> = ({ query, onChange, onSubmit, submitted }) => {
  return (
    <div className="flex flex-col items-center w-full">
      {/* Logo estilo Laravel */}
      <div
        className={`transition-all duration-300 font-bold ${
          submitted ? 'mt-6 mb-4 text-2xl' : 'mt-24 mb-8 text-5xl'
        } text-red-600 dark:text-red-400`}
      >
        {/* Puedes reemplazar por una imagen SVG del logo Laravel */}
        Laravel<span className="text-gray-700 dark:text-gray-300">Search</span>
      </div>

      {/* Formulario */}
      <form
        onSubmit={onSubmit}
        className="flex w-full max-w-xl items-center bg-white dark:bg-gray-800 rounded-full shadow-md px-4 py-2 focus-within:ring-2 focus-within:ring-red-500 transition"
      >
        {/* Icono lupa */}
        <Search className="text-gray-500 dark:text-gray-300 mr-2" size={20} />

        {/* Input */}
        <input
          type="text"
          value={query}
          onChange={onChange}
          placeholder="Buscar funcionario..."
          className="flex-1 bg-transparent outline-none text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400"
        />

        {/* Botón Buscar */}
        <button
          type="submit"
          className="bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white rounded-full px-4 py-1 ml-2 flex items-center gap-1 transition-colors"
        >
          <Search size={18} /> Buscar
        </button>
      </form>
    </div>
  );
};

export default SearchForm;
