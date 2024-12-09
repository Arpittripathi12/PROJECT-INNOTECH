//chatbot
const API_KEY = 'AIzaSyBC1kvGyoaSi724oaBIkf5ufgWvydiIPHI'; 
          const API_URL = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent';
  
          const chatContainer = document.getElementById('chat-container');
          const chatIcon = document.getElementById('chat-icon');
          const chatMessages = document.getElementById('chat-messages');
          const userInput = document.getElementById('user-input');
          const sendButton = document.getElementById('send-button');
  
          chatIcon.addEventListener('click', () => {
              chatContainer.style.display = chatContainer.style.display === 'flex' ? 'none' : 'flex';
          });
  
          async function generateResponse(prompt) {
            const contextualPrompt = `
                You are an agriculture-focused chatbot on a website where farmers can list their land as stocks and investors can invest. 
                Provide helpful, domain-specific answers to user queries about farming practices, land investment, crop management, and profitability.
                Always respond concisely and accurately,your name is Agrobot.give also the how to cultivate the good wheat, rice,paddy,sugarcane with what is
                their real time price in market.
                give team information when asked by user
                Rememnber team members in the website as
                Ayush Verma(team leader)
                Arpit Tripathi(fromtend and backend developer)
                Ayush chaurasiya(frontend developer and management head)
                Saurabh Mishra(frontend developer and organiser head)
                tell about the weather condition of the particular area
                change your language to other language in which asked by user
                keep track on before questions asked by user and reply accordingly.
                
              
        
                Question: ${prompt}
            `;
            const response = await fetch(`${API_URL}?key=${API_KEY}`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    contents: [
                        { parts: [{ text: contextualPrompt }] }
                    ]
                })
            });
              if (!response.ok) throw new Error('Failed to generate response');
              const data = await response.json();
              return data.candidates[0].content.parts[0].text;
          }
  
          function cleanMarkdown(text) {
              return text.replace(/#{1,6}\s?/g, '').replace(/\*\*/g, '').replace(/\n{3,}/g, '\n\n').trim();
          }
  
          function addMessage(message, isUser) {
              const messageElement = document.createElement('div');
              messageElement.classList.add('message', isUser ? 'user-message' : 'bot-message');
  
              const profileImage = document.createElement('img');
              profileImage.classList.add('profile-image');
              profileImage.src = isUser ? 'user.jpg' : 'bot.jpg';
              profileImage.alt = isUser ? 'User' : 'Bot';
  
              const messageContent = document.createElement('div');
              messageContent.classList.add('message-content');
              messageContent.textContent = message;
  
              messageElement.appendChild(profileImage);
              messageElement.appendChild(messageContent);
              chatMessages.appendChild(messageElement);
  
              chatMessages.scrollTop = chatMessages.scrollHeight;
          }
  
          async function handleUserInput() {
              const userMessage = userInput.value.trim();
              if (userMessage) {
                  addMessage(userMessage, true);
                  userInput.value = '';
                  sendButton.disabled = true;
                  userInput.disabled = true;
  
                  try {
                      const botMessage = await generateResponse(userMessage);
                      addMessage(cleanMarkdown(botMessage), false);
                  } catch (error) {
                      console.error('Error:', error);
                      addMessage('Sorry, I encountered an error. Please try again.', false);
                  } finally {
                      sendButton.disabled = false;
                      userInput.disabled = false;
                      userInput.focus();
                  }
              }
          }
  
          sendButton.addEventListener('click', handleUserInput);
  
          userInput.addEventListener('keypress', (e) => {
              if (e.key === 'Enter' && !e.shiftKey) {
                  e.preventDefault();
                  handleUserInput();
              }
          });





// Toggle login options visibility
function toggleLoginOptions() {
    const loginOptions = document.getElementById('loginOptions');
    loginOptions.classList.toggle('hidden');
  }
  
  // Simulate login process
  function login(userType) {
  //   alert(`Logged in as ${userType}`); // Template literals corrected
    if (userType === 'farmer') {
      window.location.href = 'http://localhost/farmers/';
    } else {
      window.location.href = 'http://localhost/investor/';
    }
  }
  
  // Market price trends API call
  async function fetchMarketPrices() {
    try {
      const data = {
        crops: [
          { image: "https://www.researchgate.net/profile/Vinay-Sehgal/publication/268277457/figure/fig2/AS:295387198967810@1447437204566/Trends-in-crop-yields-in-India-over-the-years.png" },
          { image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRU_3Ar6czW0iefPRmpjTRjXI_QsTeKWYeMIQ&s" },
          { image: "https://morningstar.in/wordpress/wp-content/uploads/2022/01/SUNDAY-1.png" }
        ]
      };
  
      const priceTrendsDiv = document.getElementById('priceTrends');
      priceTrendsDiv.innerHTML = data.crops.map(crop => `
        <div class="bg-white p-4 rounded-lg shadow-md">
          <img src="${crop.image}" alt="Market Trend" class="w-full h-40 object-cover rounded mb-4">
          <p class="text-gray-700">Current Market Trends</p>
        </div>
      `).join('');
    } catch (error) {
      console.error("Error fetching market prices:", error);
      document.getElementById('error-message').classList.remove('hidden');
    }
  }
  
  fetchMarketPrices();
  //chat bot;
  
          const sentence = "We Grow,You Invest,and Together We Prosper 🌾";
          const typingElement = document.getElementById("typing");
          let charIndex = 0;
          let isDeleting = false;
  
          function type() {
              if (!isDeleting) {
                  // Typing characters
                  typingElement.textContent = sentence.substring(0, charIndex++);
                  if (charIndex > sentence.length) {
                      isDeleting = true; // Switch to deleting after typing
                      setTimeout(type, 2000); // Pause after completing the sentence
                      return;
                  }
              } else {
                  // Deleting characters
                  typingElement.textContent = sentence.substring(0, charIndex--);
                  if (charIndex < 0) {
                      isDeleting = false; // Switch to typing after deleting
                  }
              }
  
              // Adjust speed for typing and deleting
              const typingSpeed = isDeleting ? 50 : 100;
              setTimeout(type, typingSpeed);
          }
  
          // Start the typing effect
          type();