function Elements($elements) {
    var self = this;
    self.eles = [...$elements].map((p) => new Element(p));
    self.forEach = function ($callback) {
        self.eles.forEach($callback);
    }
    self.on = function ($event, $callback) {
        self.forEach(function ($item) {
            $item.on($event, $callback);
        })
    }
    self.click = function ($callback) {
        self.forEach(function ($item) {
            $item.click($callback);
        })
    }
    self.map = function ($callback) {
        return self.eles.map($callback);
    }
    self.filter = function ($callback) {
        return self.eles.filter($callback);
    }
}
function Element($element) {
    var self = this;
    self.ele = $element;
    self.queryAll = function ($selector) {
        return new Elements(self.ele.querySelectorAll($selector));
    }
    self.query = function ($selector) {
        return new Element(self.ele.querySelector($selector));
    }
    self.on = function ($event, $callback) {
        if ($callback) {
            self.ele.addEventListener($event, function (e) {
                $callback(self, e);
            });
        }
    }

    self.click = function ($callback) {
        if ($callback) self.on("click", $callback);
        else self.ele.click();
    }
    self.hasClass = function ($class) {
        return self.ele.classList.contains($class);
    }
    self.addClass = function ($class) {
        return self.ele.classList.add($class);
    }
    self.removeClass = function ($class) {
        return self.ele.classList.remove($class);
    }
    self.parent = function () {
        return new Element(self.ele.parentElement);
    }
    self.parents = function ($selector) {
        return new Element(self.ele.closest($selector));
    }
    self.isInViewport = function isInViewport() {
        const rect = self.ele.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
}
function Application() {
    var self = this;
    self.start = function () {
    }
    self.queryAll = function ($selector) {
        return new Elements(document.querySelectorAll($selector));
    }
    self.query = function ($selector) {
        return new Element(document.querySelector($selector));
    }
    self.on = function ($selector, $event, $callback) {
        self.queryAll($selector).on($event, $callback);
    }
    self.click = function ($selector, $callback) {
        self.queryAll($selector).click($callback);
    }
    self.ready = function ($callback) {
        document.addEventListener("DOMContentLoaded", $callback);
    }
    self.lazyImage = function () {
        self.ready(function () {
            var lazyloadImages;
            if ("IntersectionObserver" in window) {
                lazyloadImages = document.querySelectorAll(".lazy");
                
                var imageObserver = new IntersectionObserver(function (entries, observer) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            var image = entry.target;
                            image.classList.remove("lazy");
                            imageObserver.unobserve(image);
                        }
                    });
                });

                lazyloadImages.forEach(function (image) {
                    imageObserver.observe(image);
                });
            } else {
                var lazyloadThrottleTimeout;
                lazyloadImages = document.querySelectorAll(".lazy");

                function lazyload() {
                    if (lazyloadThrottleTimeout) {
                        clearTimeout(lazyloadThrottleTimeout);
                    }

                    lazyloadThrottleTimeout = setTimeout(function () {
                        var scrollTop = window.pageYOffset;
                        lazyloadImages.forEach(function (img) {
                            if (img.offsetTop < (window.innerHeight + scrollTop)) {
                                img.src = img.dataset.src;
                                img.classList.remove('lazy');
                            }
                        });
                        if (lazyloadImages.length == 0) {
                            document.removeEventListener("scroll", lazyload);
                            window.removeEventListener("resize", lazyload);
                            window.removeEventListener("orientationChange", lazyload);
                        }
                    }, 20);
                }

                document.addEventListener("scroll", lazyload);
                window.addEventListener("resize", lazyload);
                window.addEventListener("orientationChange", lazyload);
            }
        })
    }

}
var ABase = new Application();
ABase.start();
ABase.lazyImage();
window.ABase = ABase;