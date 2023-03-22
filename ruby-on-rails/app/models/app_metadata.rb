class AppMetadata
  def initialize(manager_flag, organisation)
    @manager_flag = manager_flag
    @organisation = organisation
  end

  def get_manager_flag
    @manager_flag
  end

  def get_organisation
    @organisation
  end
end
