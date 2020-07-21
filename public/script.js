// Select elements
const selectElement = (s) => document.querySelector(s);
// Open the menu
selectElement(".open").addEventListener("click", () => {
  selectElement(".nav-list").classList.add("active");
});
// Close the menu
selectElement(".close").addEventListener("click", () => {
  selectElement(".nav-list").classList.remove("active");
});
