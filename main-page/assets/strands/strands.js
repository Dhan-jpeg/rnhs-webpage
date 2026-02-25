// Data for each strand
const strandData = {
  stem: {
    title: "STEM",
    fullName: "Science, Technology, Engineering, and Mathematics",
    icon: "fa-chart-pie",
    description: "The STEM strand is designed for students who are inclined towards scientific and mathematical disciplines. It equips learners with the skills to solve complex problems and innovate technology.",
    subjects: ["Calculus", "Physics", "Chemistry", "Biology", "Research", "Statistics"],
    careers: ["Engineer", "Doctor", "Software Developer", "Architect", "Data Scientist"]
  },
  humss: {
    title: "HUMSS",
    fullName: "Humanities and Social Sciences",
    icon: "fa-cubes",
    description: "HUMSS focuses on literature, history, philosophy, and social sciences. It is ideal for students who want to pursue careers in education, communication, or public service.",
    subjects: ["Philosophy", "World History", "Creative Writing", "Sociology", "Psychology", "Media"],
    careers: ["Teacher", "Journalist", "Lawyer", "Psychologist", "Writer"]
  },
  abm: {
    title: "ABM",
    fullName: "Accountancy, Business, and Management",
    icon: "fa-comments",
    description: "ABM prepares students for business and entrepreneurship. The curriculum focuses on financial management, marketing, and organizational behavior.",
    subjects: ["Accounting", "Business Math", "Economics", "Marketing", "Office Management"],
    careers: ["Accountant", "Business Manager", "Marketing Exec", "Entrepreneur", "HR Specialist"]
  },
  tvl: {
    title: "TVL",
    fullName: "Technical-Vocational Livelihood",
    icon: "fa-chart-line",
    description: "TVL offers hands-on training in technical skills. It is designed for students who want to enter the workforce immediately after Senior High School or pursue technical courses.",
    subjects: ["Electrical", "Automotive", "Culinary", "Beauty Care", "ICT", "Drafting"],
    careers: ["Electrician", "Chef", "Mechanic", "Beautician", "Carpenter"]
  },
  gas: {
    title: "GAS",
    fullName: "General Academic Strand",
    icon: "fa-stethoscope",
    description: "GAS is a flexible strand that allows students to take a balanced mix of subjects from other strands. It is perfect for those who haven't decided on a specific career path yet.",
    subjects: ["English", "Mathematics", "Science", "Humanities", "Social Sciences"],
    careers: ["Civil Servant", "Freelancer", "General Manager", "Public Relations"]
  }
};

// Function to open modal
function openModal(strandKey) {
  const data = strandData[strandKey];
  const modal = document.getElementById('strandModal');
  
  // Populate data
  document.getElementById('modalTitle').innerText = data.title;
  document.getElementById('modalSubtitle').innerText = data.fullName;
  document.getElementById('modalDesc').innerText = data.description;
  
  // Set Icon
  const iconElement = document.getElementById('modalIcon');
  iconElement.className = `fas ${data.icon}`;
  
  // Populate Subjects
  const subjectsList = document.getElementById('modalSubjects');
  subjectsList.innerHTML = data.subjects.map(sub => `<li>${sub}</li>`).join('');
  
  // Populate Careers
  const careersList = document.getElementById('modalCareers');
  careersList.innerHTML = data.careers.map(career => `<span>${career}</span>`).join('');
  
  // Show
  modal.classList.add('show');
}

// Function to close modal
function closeModal() {
  const modal = document.getElementById('strandModal');
  modal.classList.remove('show');
}