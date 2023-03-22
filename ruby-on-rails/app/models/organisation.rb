class Organisation
  def initialize(name, id, membership_status, organisation_state)
    @name = name
    @id = id
    @membership_status = membership_status
    @organisation_state = organisation_state
  end

  def get_name
    @name
  end

  def get_id
    @id
  end

  def get_membership_status
    @membership_status
  end

  def get_organisation_state
    @organisation_state
  end

end
