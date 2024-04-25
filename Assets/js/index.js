import { Ripple, initMDB } from "mdb-ui-kit";

initMDB({ Ripple });
/**
 * Add to favorite button toggle
 */

const /** {NodeList} */ $toggleBtns = document.querySelectorAll("[data-toggle-btn]");

$toggleBtns.forEach($toggleBtn => {
  $toggleBtn.addEventListener("click", () => {
    $toggleBtn.classList.toggle("active");
  });
});