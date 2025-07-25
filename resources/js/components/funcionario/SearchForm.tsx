// src/components/SearchForm.tsx
import React from 'react';

interface SearchFormProps {
  query: string;
  onChange: (e: React.ChangeEvent<HTMLInputElement>) => void;
  onSubmit: (e: React.FormEvent<HTMLFormElement>) => void;
}

const SearchForm: React.FC<SearchFormProps> = ({ query, onChange, onSubmit }) => {
  return (
    <form onSubmit={onSubmit} className="w-full max-w-md px-4">
      <input
        type="text"
        value={query}
        onChange={onChange}
        placeholder="Buscar en Alfredo..."
        className="w-full border border-gray-300 px-4 py-2 rounded-lg shadow focus:outline-none focus:ring focus:border-blue-500"
      />
    </form>
  );
};

export default SearchForm;
