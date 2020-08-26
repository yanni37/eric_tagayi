/******************* fenetre modal pour LOGIN *******************/

document.addEventListener('DOMContentLoaded', () => {
  const triggers = document.querySelectorAll('[aria-haspopup="dialog"]');

  const focusableElementsArray = [
    '[href]',
    'button:not([disabled])',
    'input:not([disabled])',
    'select:not([disabled])',
    'textarea:not([disabled])',
    '[tabindex]:not([tabindex="-1"])',
  ];
  const keyCodes = {
    tab: 9,
    enter: 13,
    escape: 27,
  };

  const open = function (dialog) {
    const focusableElements = dialog.querySelectorAll(focusableElementsArray);
    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement = focusableElements[focusableElements.length - 1];

    dialog.setAttribute('aria-hidden', false);


    // Lors de l'affichage de la page d'authentification si les touches du clavier ne ciblent pas le premier elements alors l'utilisation du clavier ne fonctionnera pas.

    if (!firstFocusableElement) {
      return;
    }

    window.setTimeout(() => {
      firstFocusableElement.focus();

      // se deplacer dans la fenetre d'authentifaction grace aux touches du clavier afin de passer de la cellule email et la cellule mot de passe 

      focusableElements.forEach((focusableElement) => {
        if (focusableElement.addEventListener) {
          focusableElement.addEventListener('keydown', (event) => {
            const tab = event.which === keyCodes.tab;

            if (!tab) {
              return;
            }

            if (event.shiftKey) {
              if (event.target === firstFocusableElement) {
                event.preventDefault();

                lastFocusableElement.focus();
              }
            } else if (event.target === lastFocusableElement) {
              event.preventDefault();

              firstFocusableElement.focus();
            }
          });
        }
      });
    }, 100);
  };

  const close = function (dialog, trigger) {
    dialog.setAttribute('aria-hidden', true);

    trigger.focus();
  };

  triggers.forEach((trigger) => {
    const dialog = document.getElementById(trigger.getAttribute('aria-controls'));
    const dismissTriggers = dialog.querySelectorAll('[data-dismiss]');

    //ouvrir la fenetre modal
    trigger.addEventListener('click', (event) => {
      event.preventDefault();

      open(dialog);
    });

    trigger.addEventListener('keydown', (event) => {
      if (event.which === keyCodes.enter) {
        event.preventDefault();

        open(dialog);
      }
    });

    // fermer la fenetre d'authentification grace à la touche échap

    dialog.addEventListener('keydown', (event) => {
      if (event.which === keyCodes.escape) {
        close(dialog, trigger);
      }
    });

    dismissTriggers.forEach((dismissTrigger) => {
      const dismissDialog = document.getElementById(dismissTrigger.dataset.dismiss);

      dismissTrigger.addEventListener('click', (event) => {
        event.preventDefault();

        close(dismissDialog, trigger);
      });
    });

    window.addEventListener('click', (event) => {
      if (event.target === dialog) {
        close(dialog, trigger);
      }
    });
  });
});