// src/pages/SearchPage.tsx
import React, { useState } from 'react';
import SearchForm from '../../components/funcionario/SearchForm';
import SearchResults from '../../components/funcionario/SearchResults';
import AppLayout from '@/layouts/app-layout';
import { Head } from '@inertiajs/react';

const SearchPage: React.FC = () => {
  const [query, setQuery] = useState('');
  const [submitted, setSubmitted] = useState(false);
  const [submittedQuery, setSubmittedQuery] = useState('');

  const handleSubmit = (e: React.FormEvent<HTMLFormElement>) => {
    e.preventDefault();
    if (query.trim() !== '') {
        setSubmitted(true)
        setSubmittedQuery(query.trim());
    }
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setQuery(e.target.value);
  };

  return (
    <AppLayout>
      <Head title="Funcionarios" />
      <div className={`min-h-screen flex flex-col items-center ${submitted ? 'pt-10' : 'justify-center'}`}>
        <SearchForm query={query} onChange={handleChange} onSubmit={handleSubmit} submitted={submitted} />
        {submitted && <SearchResults query={submittedQuery} />}
      </div>
    </AppLayout>
  );
};

export default SearchPage;
