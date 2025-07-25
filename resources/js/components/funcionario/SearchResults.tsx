// src/components/SearchResults.tsx
import React from 'react';

interface SearchResultsProps {
  query: string;
}

const SearchResults: React.FC<SearchResultsProps> = ({ query }) => {
  return (
    <div className="mt-6 w-full max-w-2xl px-4">
      <p className="text-gray-600 mb-2">Resultados para: <strong>{query}</strong></p>
      <ul className="space-y-2">
        {Array.from({ length: 5 }).map((_, i) => (
          <li key={i} className="bg-white p-4 rounded shadow border hover:bg-gray-100 cursor-pointer">
            Resultado {i + 1} relacionado con "{query}"
          </li>
        ))}
      </ul>
    </div>
  );
};

export default SearchResults;
