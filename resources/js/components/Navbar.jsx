import React, { useState } from 'react';
import ReactDOM from 'react-dom/client';

const Navbar = ({ isAuthenticated, userName }) => {
    const [isMenuOpen, setMenuOpen] = useState(false);

    const toggleMenu = () => {
        setMenuOpen(!isMenuOpen);
    };

    return (
        <div className='w-full'>
            <nav className="bg-gray-800 py-4">
                <div className="container mx-auto flex justify-between items-center">
                    {/* Logo */}
                    <a href="/"><img src="/images/logo.png" alt="My logo" className="m-0 p-0" width="70" height="70" /></a>

                    {/* Hamburger menu */}
                    <div className="lg:hidden absolute top-4 right-4 z-50">
                        <button id="hamburger-toggle" onClick={toggleMenu} className="text-white focus:outline-none">
                            <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>

                    {/* Navbar links */}
                    <ul className="hidden lg:flex space-x-4">
                        {!isAuthenticated ? (
                            <>
                                <li><a href="/register" className="text-white hover:text-gray-300">Register</a></li>
                                <li><a href="/login" className="text-white hover:text-gray-300">Login</a></li>
                            </>
                        ) : (
                            <>
                                <li><a href="#" className="text-white hover:text-gray-300 no-underline">{userName}</a></li>
                                <li>
                                    <form action="/logout" method="post">
                                        <button type="submit" className="text-white hover:text-gray-300">Logout</button>
                                    </form>
                                </li>
                            </>
                        )}
                    </ul>
                </div>
            </nav>

            {/* Side-bar menu */}
            <div className={`lg:hidden fixed inset-0 bg-gray-900 bg-opacity-75 z-40 transform ${isMenuOpen ? 'translate-x-0' : '-translate-x-full'} transition-transform duration-300 ease-in-out`}>
                <div className="bg-gray-800 w-64 h-full p-6">
                    <button onClick={toggleMenu} className="text-white mb-6">
                        <svg className="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <nav className="px-4 mt-6">
                        <a href="/"
                            className="block px-4 py-2 mt-2 text-sm font-semibold text-white bg-gray-700 rounded hover:bg-gray-600 no-underline">Dashboard</a>
                        <a href="/videosDue"
                            className="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600 no-underline">Videos Due To
                            Upload</a>
                        <a href="/videosPublished"
                            className="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600 no-underline">Uploaded
                            Videos</a>
                        <a href="/submitVideo"
                            className="block px-4 py-2 mt-2 text-sm font-semibold text-white rounded hover:bg-gray-600 no-underline">Calendar/Scheduler</a>
                    </nav>
                </div>
            </div>
        </div>
    );
};

// Initialize the Navbar component in the DOM
document.querySelectorAll('.react-navbar').forEach(domContainer => {
    const isAuthenticated = domContainer.getAttribute('data-authenticated') === 'true';
    const userName = domContainer.getAttribute('data-username') || '';

    const root = ReactDOM.createRoot(domContainer);
    root.render(
        <React.StrictMode>
            <Navbar isAuthenticated={isAuthenticated} userName={userName} />
        </React.StrictMode>
    );
});

export default Navbar;
