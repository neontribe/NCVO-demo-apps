class WhoAmI
  def initialize(name, email, uuid, email_verified, app_metadata)
    @name = name
    @email = email
    @uuid = uuid
    @email_verified = email_verified
    @app_metadata = app_metadata
  end

  def get_name
    @name
  end

  def get_email
    @email
  end

  def get_uuid
    @uuid
  end

  def get_email_verified
    @email_verified
  end

  def get_app_metadata
    @app_metadata
  end
end
