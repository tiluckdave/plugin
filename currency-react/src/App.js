import React, { useState } from 'react';
import './App.css';

const App = () => {
  const [dollars, setDollars] = useState('');
  const [rupees, setRupees] = useState('');
  const exchangeRate = 75; // Replace with the actual exchange rate

  const handleDollarChange = (event) => {
    const value = event.target.value;
    setDollars(value);
    convertCurrency(value);
  };

  const convertCurrency = (value) => {
    const rupeeValue = parseFloat(value) * exchangeRate;
    setRupees(rupeeValue.toFixed(2));
  };

  return (
    <div className="App">
      <h1>Currency Converter</h1>
      <div>
        <label htmlFor="dollars">Enter Dollars:</label>
        <input
          type="number"
          id="dollars"
          value={dollars}
          onChange={handleDollarChange}
        />
      </div>
      <div>
        <p>Converted Rupees: {rupees}</p>
      </div>
    </div>
  );
};

export default App;
