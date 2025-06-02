#!/bin/sh

if [ ! -d "node_modules" ]; then
  echo "Installing dependencies..."
  npm install
fi

if [ ! -f "tailwind.config.js" ]; then
  echo "Initializing Tailwind..."
  npx tailwindcss init -p
fi

echo "Starting Vite..."
npm run dev