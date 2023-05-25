  document.addEventListener("DOMContentLoaded", function() {
    // Check if a cookie exists for the last accessed tab
    const lastTab = document.cookie.replace(/(?:(?:^|.*;\s*)lastTab\s*=\s*([^;]*).*$)|^.*$/, "$1");

    // Activate the first tab if the last accessed tab is the first one (balance)
    if (lastTab === "#balance") {
      const firstTabLink = document.querySelector("[href='#balance']");
      const firstTabPane = document.getElementById("balance");

      if (firstTabLink && firstTabPane) {
        firstTabLink.classList.add("active");
        firstTabPane.classList.add("show", "active");

        // Remove active class from unselected tabs
        const tabLinks = document.querySelectorAll(".nav-link");
        tabLinks.forEach((link) => {
          if (link !== firstTabLink) {
            link.classList.remove("active");
          }
        });

        // Hide other tab panes
        const tabPanes = document.querySelectorAll(".tab-pane");
        tabPanes.forEach((pane) => {
          if (pane !== firstTabPane) {
            pane.classList.remove("show", "active");
          }
        });

        // Destroy the cookie for the last accessed tab
        document.cookie = "lastTab=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      }
    } else if (lastTab && lastTab !== "#balance") {
      // Prompt the user with a modal to choose whether to resume from the last accessed tab
      const modal = new bootstrap.Modal(document.getElementById("tabModal"));
      const modalContinueBtn = document.getElementById("modalContinueBtn");
      const modalStartBtn = document.getElementById("modalStartBtn");

      // Continue from the last accessed tab
      modalContinueBtn.addEventListener("click", function() {
        modal.hide();

        // Activate the last accessed tab
        const lastTabLink = document.querySelector(`[href="${lastTab}"]`);
        const lastTabPane = document.querySelector(lastTab);

        if (lastTabLink && lastTabPane) {
          lastTabLink.classList.add("active");
          lastTabPane.classList.add("show", "active");

          // Remove active class from unselected tabs
          const tabLinks = document.querySelectorAll(".nav-link");
          tabLinks.forEach((link) => {
            if (link !== lastTabLink) {
              link.classList.remove("active");
            }
          });

          // Hide other tab panes
          const tabPanes = document.querySelectorAll(".tab-pane");
          tabPanes.forEach((pane) => {
            if (pane !== lastTabPane) {
              pane.classList.remove("show", "active");
            }
          });
        }
      });

      // Start from the first tab
      modalStartBtn.addEventListener("click", function() {
        modal.hide();

        // Activate the first tab
        const firstTabLink = document.querySelector("[href='#balance']");
        const firstTabPane = document.getElementById("balance");

        if (firstTabLink && firstTabPane) {
          firstTabLink.classList.add("active");
          firstTabPane.classList.add("show", "active");

          // Remove active class from unselected tabs
          const tabLinks = document.querySelectorAll(".nav-link");
          tabLinks.forEach((link) => {
            if (link !== firstTabLink) {
              link.classList.remove("active");
            }
          });
          // Hide other tab panes
          const tabPanes = document.querySelectorAll(".tab-pane");
          tabPanes.forEach((pane) => {
            if (pane !== firstTabPane) {
              pane.classList.remove("show", "active");
            }
          });

          // Destroy the cookie for the last accessed tab
          document.cookie = "lastTab=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
      });

      // Show the modal if the cookie exists and the last accessed tab is not the first one (balance)
      //modal.show();
    }
  });