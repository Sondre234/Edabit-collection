const holdLokalt = sessionStorage;
const konfirmer = 'konfirmer';

const visCookiePopup = () => !holdLokalt.getItem(konfirmer);
const lagre = () =>  holdLokalt.setItem(konfirmer, true);

window.onload = () => {

    if (visCookiePopup()) {

      const godta = confirm('By continuing to use this website you agree to our cookie policy');

        if (godta) {
          lagre();
        }
    }
}