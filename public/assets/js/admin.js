(function($) {
  // mpdels
  var User = {
    _currentUser: false,
    isLoggedIn: function() {
      return !!this._currentUser;
    },
    current: function(callback, force) {
      var user = this;
      if (!this._currentUser || force === true) {
        $.couch.session({
          success: function(session) {
            if (session.userCtx && session.userCtx.name) {
              user._currentUser = session.userCtx;
              callback(user._currentUser);
            } else {
              user._currentUser = false;
              callback(false);
            }
          }
        });
      } else {
        callback(user._currentUser);
      }
    },
    login: function(name, password, callback) {
      $.couch.login({
        name : name,
        password : password,
        success: function() {
          User.current(callback, true);
        },
        error: function(code, error, reason) {
          showNotification('error', reason);
        }
      });
    },
    logout: function(callback) {
      var user = this;
      $.couch.logout({
        success: function() {
          user._currentUser = false;
          callback();
        },
        error: function(code, error, reason) {
          $.griner.showNotification('error', reason);
        }
      });
    },
    signup: function(name, email, password, callback) {
      $.couch.signup({name: name, email: email}, password, {
        success: function() {
          User.login(name, password, callback);
        },
        error: function(code, error, reason) {
          $.griner.showNotification('error', reason);
        }
      })
    }
  };


  // Routes =======================================================================
  var app = $.sammy('#main', function() {
    this.use('Template', 'tpl');
    this.use('Session');

    this.get('#/', function(context) {
      this.partial('/assets/tpl/portal/index.tpl');
    });

    this.get('#/login', function(context) {
      this.partial('/assets/tpl/portal/layout.tpl', function() {
        context.render('/assets/tpl/portal/login.tpl').replace('#content');
      });
    });

  });

  // Run =======================================================================
  $(function() {
    app.run('#/');
  });

})(jQuery);