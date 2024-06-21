import React, { useState } from 'react';

const SuccessMessage = ({ message }) => {
  const [visible, setVisible] = useState(true);

  const handleClose = () => {
    setVisible(false);
  };

  if (!visible) return null;

  return (
    <div className="bg-green-500 text-white font-bold px-4 py-2 rounded-md shadow-md transition-all duration-150 ease-in-out" role="alert">
      {message}
      <button type="button" className="top-0 right-0 px-3 py-1 text-white" onClick={handleClose} aria-label="Close">
        X
      </button>
    </div>
  );
};

export default SuccessMessage;
