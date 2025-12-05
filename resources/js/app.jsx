import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'

function ReactButton() {
  return (
    <button class="text-purple-500">A simple React button</button>
  );
}

createRoot(document.querySelector('#react-content')).render(
  <StrictMode>
    <ReactButton/>
  </StrictMode>,
)