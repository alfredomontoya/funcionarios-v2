// src/pages/SearchPage.tsx
import React, { useState } from 'react';
import SearchForm from '../../components/funcionario/SearchForm';
import SearchResults from '../../components/funcionario/SearchResults';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

const SearchPage: React.FC = () => {
  const [query, setQuery] = useState('');
  const [submitted, setSubmitted] = useState(false);

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    setSubmitted(true);
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setQuery(e.target.value);
  };

  return (
    <AppLayout>
      <Head title="Funcionarios" />
      {/* <div className={`min-h-screen flex flex-col items-center ${submitted ? 'pt-10' : 'justify-center'}`}>
        <SearchForm query={query} onChange={handleChange} onSubmit={handleSubmit} />
        {submitted && <SearchResults query={query} />}
      </div> */}
    </AppLayout>
  );
};

export default SearchPage;
